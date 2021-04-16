INSERT DE LAS TABLAS :

INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`)
VALUES ('Mariano','Kautor','123456','dkantor0@example.com','2020/07/01','Quilmes'),
('German','Gerram','123456','ggerram1@hud.gov','2020/08/05','Berazategui'),
('Deloris','Fosis','123456','bsharpe2@wisc.edu','2020/11/28','Avellaned'),
('Brok','Neiner','123456','bblazic3@desdev.cn','2020/08/12','Quilmes'),
('Garrick','Brent','123456','nt4@theguardian.com','2020/12/17','Moron'),
('Bili','Baus','123456','bhoff5@addthis.com','2020/11/27','Moreno')


INSERT INTO `ventas`(`id_producto`, `id_usuario`, `cantidad`, `fecha_de_venta`)
VALUES ('1001','101',2,'2020/07/19'),
       ('1008','102',3,'2020/07/19'),
       ('1007','102',4,'2020/07/19'),
       ('1006','103',5,'2020/07/19'),
       ('1003','104',6,'2020/07/19'),
       ('1005','105',7,'2020/07/19'),
       ('1003','104',6,'2020/07/19'),
       ('1003','106',6,'2020/07/19'),
       ('1002','106',6,'2020/07/19'),
       ('1002','106',1,'2020/07/19')


INSERT INTO `productos`(`id`, `codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`, `fecha_de_modificacion`) 
VALUES (1001,'77900361','Westmacott','liquido',33,15.87,'2021/09/02','2020/09/26'),
(1002,'77900362','Spirit','solido',45,69.74,'2020/09/18','2020/04/14'),
(1003,'77900363','Newgroshv','polvo',14,68.19,'2020/11/29','2021/02/11'),
(1004,'77900364','McNickle','polvo',19,53.51,'2020/11/28','2020/04/17'),
(1005,'77900365','Hudd','solido',68,25.56,'2020/12/19','2020/06/19'),
(1006,'77900366','Schrader','polvo',96,54.87,'2020/08/02','2020/04/18'),
(1007,'77900367','Bachellier','solido',59,69.17,'2021/01/30','2020/06/07'),
(1008,'77900368','Fleming','solido',38,66.77,'2020/10/26','2020/03/10'),
(1009,'77900369','Hurry','solido',44,43.01,'2020/07/04','2020/05/30'),
(1010,'77900310','Krauss','polvo',73,35.73,'2021/03/03','2020/08/30')




CONSULTAS:


1. Obtener los detalles completos de todos los usuarios, ordenados alfabéticamente.

SELECT * FROM `usuarios` ORDER BY nombre,apellido

2. Obtener los detalles completos de todos los productos líquidos.

SELECT * FROM `productos` WHERE tipo='LIQUIDO'

3. Obtener todas las compras en los cuales la cantidad esté entre 6 y 10 inclusive.

SELECT * FROM `ventas` WHERE cantidad BETWEEN 06 AND 10 

4. Obtener la cantidad total de todos los productos vendidos.

SELECT SUM(cantidad) as total_vendidos FROM `ventas` 

5. Mostrar los primeros 3 números de productos que se han enviado.

SELECT * FROM `productos` ORDER BY fecha_de_creacion LIMIT 3

6. Mostrar los nombres del usuario y los nombres de los productos de cada venta.

SELECT A.*,B.nombre ,C.nombre FROM `ventas` A
INNER JOIN `usuarios` B ON A.id_usuario = b.id 
INNER JOIN `productos` C ON C.id = A.id_producto


7. Indicar el monto (cantidad * precio) por cada una de las ventas.

SELECT *,  A.cantidad* b.precio as total FROM `ventas` A 
INNER JOIN `productos` B ON A.id_producto = B.id


8. Obtener la cantidad total del producto 1003 vendido por el usuario 104.

SELECT SUM(cantidad) AS total FROM `ventas` WHERE id_usuario = 104 AND id_producto = 1003 

9. Obtener todos los números de los productos vendidos por algún usuario de
‘Avellaneda’.

SELECT A.* ,b.localidad FROM `ventas` A
INNER JOIN `usuarios` B ON A.id_usuario = b.id and  B.localidad = 'Avellaneda'


10.Obtener los datos completos de los usuarios cuyos nombres contengan la letra ‘u’.

SELECT * FROM `usuarios`
where nombre LIKE '%u%' OR apellido LIKE '%u%'


11. Traer las ventas entre junio del 2020 y febrero 2021.

SELECT * FROM `ventas` WHERE fecha_de_venta BETWEEN '2020/06/01' AND '2021/02/01' 

12. Obtener los usuarios registrados antes del 2021.

SELECT * FROM `usuarios` WHERE fecha_de_registro < '2021/01/01' 

13.Agregar el producto llamado ‘Chocolate’, de tipo Sólido y con un precio de 25,35.

INSERT INTO `productos`( `codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`, `fecha_de_modificacion`) 
VALUES ('4546648','Chocolate','solido',33,25.35,CURRENT_DATE,CURRENT_DATE)

14.Insertar un nuevo usuario .

INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`)
VALUES ('Matias','Aguirre','123456','matias@example.com',CURRENT_DATE,'Banfield')

15.Cambiar los precios de los productos de tipo sólido a 66,60.

UPDATE `productos` SET precio = 66.60 WHERE tipo = 'solido' 


16.Cambiar el stock a 0 de todos los productos cuyas cantidades de stock sean menores
a 20 inclusive.

UPDATE `productos` SET stock = 0
WHERE stock <= 20

17.Eliminar el producto número 1010.

DELETE FROM `productos` WHERE id=1010


18.Eliminar a todos los usuarios que no han vendido productos.

DELETE A FROM `usuarios` A 
INNER JOIN `ventas` B ON b.id_usuario = a.id and B.cantidad = 0

