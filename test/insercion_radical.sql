CREATE OR REPLACE FUNCTION insercion_radical (numero integer)
RETURNS void AS
$$
DECLARE
    temp varchar;
BEGIN
    FOR i IN 1..numero LOOP
        temp := to_char(i,'99999999');
        INSERT INTO Personas VALUES (temp, temp, temp);
    END LOOP;
END
$$ language plpgsql;