CREATE OR REPLACE FUNCTION potencia(numero integer)
RETURNS float AS $$
DECLARE
    result float;
BEGIN
    result = POWER(2, numero);
    RETURN result;
END
$$ language plpgsql