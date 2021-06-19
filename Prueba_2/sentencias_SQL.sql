CREATE DATABASE testdevjr_prueba2;
go
USE testdevjr_prueba2;
go
CREATE TABLE logDial(
idLlamada VARCHAR(10) ,
fechaDeLlamada DATETIME,
tiempoDialogo SMALLINT,
telefono VARCHAR(10),
tipoDeLlamada VARCHAR(15)
)
go
CREATE TABLE costos(
tipoDeLlamada VARCHAR(15),
costo DECIMAL(10,4)
)


--Que muestre los registros con tipo de llamada Cel LD durante el mes febrero (5 puntos)
SELECT ld.idLlamada,
       ld.fechaDeLlamada,
       ld.tiempoDialogo,
       ld.telefono,
       ld.tipoDeLlamada FROM dbo.logDial AS ld WHERE ld.tipoDeLlamada = 'Cel LD' AND MONTH(ld.fechaDeLlamada) = 2;

--Que indique el promedio de tiempo de dialogo de las llamadas con tipo Cel LD durante el mes de febrero (5 puntos)
SELECT AVG(ld.tiempoDialogo) AS TiempoDialogo FROM dbo.logDial AS ld WHERE ld.tipoDeLlamada = 'Cel LD' AND MONTH(ld.fechaDeLlamada) = 2; 

--Que muestre el número en minutos de dialogo (tomando tiempoDialogo que está en segundos) y el costo de todas las llamadas del mes de enero (10 puntos)
SELECT SUM(ld.tiempoDialogo)/60.0 AS TiempoDialogoMinutos,
       SUM(c.costo) AS CostoTotalLlamadas FROM dbo.logDial AS ld LEFT JOIN dbo.costos AS c ON ld.tipoDeLlamada = c.tipoDeLlamada WHERE MONTH(ld.fechaDeLlamada) =1




