CREATE OR REPLACE FUNCTION
planificar_2 (_presupuesto integer, _comuna varchar, _nombre_ong varchar)
RETURNS TABLE (id integer, ong text, proyecto text, presupuesto integer, tipo text, fecha date, estimacion int, lugar text, tipo_contenido text, duracion integer) AS $$
DECLARE 
    resultado_proyecto_planificar RECORD;
    pid_planificados integer ARRAY := '{}';
    pid_planificado INTEGER;
    proyecto_planificado RECORD;
    presupuesto_individual integer;
    opciones_tipo varchar ARRAY := '{marcha, redes sociales}';
    opcion_tipo varchar;
    fecha_guardar date;
    duracion_guardar integer;
    n_esperado_guardar integer;
    lugar_guardar varchar;
    contenido_guardar varchar;
    id_movilizacion_creada RECORD;
    id_movilizaciones_creadas integer ARRAY := '{}';
    movilizacion_creada_for integer;
    consulta varchar;
    nombre_proyecto varchar;

BEGIN
    FOR resultado_proyecto_planificar IN (
        SELECT Aprobados.pid, Rechazados.nombre, cantidad_aprobados as si, cantidad_rechazados as no, movilizaciones as mov  
        FROM (
            SELECT Proyectos.pid as pid, Proyectos.nombre as nombre, COUNT(Recursos.rid) as cantidad_aprobados 
            FROM Proyectos INNER JOIN Recursos ON Proyectos.pid = Recursos.pid 
            WHERE Proyectos.comuna = _comuna AND estado = 'aprobado' 
            GROUP BY Proyectos.pid
        ) AS Aprobados 
        INNER JOIN (
            SELECT Proyectos.pid as pid, Proyectos.nombre, COUNT(Recursos.rid) as cantidad_rechazados
            FROM Proyectos INNER JOIN Recursos ON Proyectos.pid = Recursos.pid 
            WHERE Proyectos.comuna = _comuna AND estado = 'rechazado' 
            GROUP BY Proyectos.pid
        ) AS Rechazados 
        ON Aprobados.pid = Rechazados.pid
        INNER JOIN (
            SELECT Proyectos.pid, Proyectos.nombre, Movilizacion.movilizaciones FROM Proyectos INNER JOIN 
            (SELECT * FROM dblink('dbname=grupo6 host=localhost port=5432 
            user=grupo6 password=grupo6',
            'SELECT proyecto, COUNT(id) FROM Movilizacion GROUP BY proyecto') 
            AS Movilizacion(proyecto TEXT, movilizaciones integer)) AS Movilizacion
            ON Proyectos.nombre = Movilizacion.proyecto WHERE comuna = _comuna
        ) AS Movilizaciones 
        ON Movilizaciones.pid = Aprobados.pid
        WHERE cantidad_rechazados > cantidad_aprobados OR movilizaciones < 60
    ) LOOP
        pid_planificados := array_append(pid_planificados, resultado_proyecto_planificar.pid);
    END LOOP;
    IF array_length(pid_planificados, 1) > 0 THEN
        presupuesto_individual := TRUNC(_presupuesto / array_length(pid_planificados, 1));
    END IF;
    FOREACH pid_planificado IN ARRAY pid_planificados
    LOOP

        
        FOR proyecto_planificado IN (SELECT * FROM Proyectos WHERE pid = pid_planificado) LOOP
            opcion_tipo := (opciones_tipo)[ceil(random()*2)];
            nombre_proyecto := REPLACE(proyecto_planificado.nombre, '''', '''''');
            IF opcion_tipo = 'marcha' THEN 
                fecha_guardar := CURRENT_DATE + 90;
                n_esperado_guardar := floor((random() * (10000-100+1)) + 100);
                lugar_guardar := _comuna;
                FOR id_movilizacion_creada IN (
                    SELECT * FROM dblink('dbname=grupo6 host=localhost port=5432 user=grupo6 password=grupo6','INSERT INTO movilizacion_2 VALUES(default, ' || presupuesto_individual || ', ''' || opcion_tipo || ''', '''  || fecha_guardar || ''', ''' || _nombre_ong || ''', ''' || nombre_proyecto || ''') returning id;') AS Ides (id integer)
                    ) LOOP
                    PERFORM dblink('dbname=grupo6 host=localhost port=5432 user=grupo6 password=grupo6','INSERT INTO marcha_2 VALUES (' || id_movilizacion_creada.id || ', ' || n_esperado_guardar || ', ''' || lugar_guardar || ''');');
                    id_movilizaciones_creadas := array_append(id_movilizaciones_creadas, id_movilizacion_creada.id);

                END LOOP;

            ELSIF opcion_tipo = 'redes sociales' THEN
                fecha_guardar := CURRENT_DATE;
                duracion_guardar := 90;
                IF proyecto_planificado.tipo = 1 THEN
                    contenido_guardar := 'spam';
                ELSIF proyecto_planificado.tipo = 2 THEN
                    contenido_guardar := 'video';
                ELSIF proyecto_planificado.tipo = 3 THEN 
                    contenido_guardar := 'imagenes';
                END IF;
                FOR id_movilizacion_creada IN (
                    SELECT * FROM dblink('dbname=grupo6 host=localhost port=5432 user=grupo6 password=grupo6','INSERT INTO movilizacion_2 VALUES(default, ' || presupuesto_individual || ', ''' || opcion_tipo || ''', '''  || fecha_guardar || ''', ''' || _nombre_ong || ''', ''' || nombre_proyecto || ''') returning id;') AS Ides (id integer)
                    ) LOOP
                    PERFORM dblink('dbname=grupo6 host=localhost port=5432 user=grupo6 password=grupo6','INSERT INTO movredsocial_2 VALUES (' || id_movilizacion_creada.id || ', ''' || contenido_guardar || ''', ' || duracion_guardar || ');');

                    id_movilizaciones_creadas := array_append(id_movilizaciones_creadas, id_movilizacion_creada.id);



                END LOOP;
            END IF;
        END LOOP;
    END LOOP;

    
RETURN QUERY EXECUTE '(SELECT * FROM dblink($1, $2)
            AS TablaRetorno(id integer, ong text, proyecto text, presupuesto integer, tipo text, fecha date, estimacion int, lugar text, tipo_contenido text, duracion integer))' 
            USING 'dbname=grupo6 host=localhost port=5432 
            user=grupo6 password=grupo6', 'SELECT movilizacion_2.id, ong, proyecto, presupuesto, tipo, fecha, estimacion, lugar, tipo_contenido, duracion from movilizacion_2 full outer join marcha_2 on movilizacion_2.id = marcha_2.id full outer join movredsocial_2 on movilizacion_2.id = movredsocial_2.id
            WHERE movilizacion_2.id = ANY(array[' || array_to_string(id_movilizaciones_creadas, ',') || ']::integer[])';
            RETURN;
END;
$$ language plpgsql;