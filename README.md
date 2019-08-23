# TutoFacebook

Codigo de ejemplo login y register con facebook del canal ioticos
Canal: https://www.youtube.com/channel/UCqxBxJnwt2JTwPM2c0kx0Yw  

Ya que este código va un poco más alla y no solo identifica al usuario sino que permite registro y logueo en base de datos es que adjunto el create table:

CREATE TABLE `tutorial` (
  `user_id` int(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(30) DEFAULT NULL,
  `user_fb` varchar(50) NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

El sistema, te permite la coexistencia de usuarios que se registraron via email (manualmente) con los de que se registraron via Facebook.



# Carpeta vendor Aclaración 
1- Para instalar la carpeta vendor si no tienes acceso a composer, bajar el archivo vendor.zip descomprimirlo y arrojar la carpeta vendor en nuestro proyecto 
ejemplo: 
C:\xampp\htdocs\Proyecto\ -> aqui colocare mi carpeta vendor (Ojo la carpeta vendor completa junto con su contenido!)

<img src="https://github.com/BenjaminSanz/TutoFacebook/blob/master/Ejemplo.jpg"></img>

2- Carpeta vendor zipeada por motivos de espacio disculpe las molestias.


