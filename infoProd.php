<?php
include './library/configServer.php';
include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Productos</title>
    <?php include './inc/link.php'; ?>
    <style>
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .whatsapp-button img {
            margin-right: 10px;
        }

        .payment-methods {
            text-align: center;
            margin-top: 20px;
        }

        .payment-methods img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body id="container-page-product">
    <?php include './inc/navbar.php'; ?>
    <section id="infoproduct">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1>DETALLE DE PRODUCTO <small class="tittles-pages-logo">LACUMBRE</small></h1>
                </div>
                <?php 
                    $CodigoProducto=consultasSQL::clean_string($_GET['CodigoProd']);
                    $productoinfo=  ejecutarSQL::consultar("SELECT * FROM products WHERE product_id='".$CodigoProducto."'");
                    while($fila=mysqli_fetch_array($productoinfo, MYSQLI_ASSOC)){
                        echo '
                            <div class="col-xs-12 col-sm-6">
                                <h3 class="text-center">Información de producto</h3>
                                <br><br>
                                <h4><strong>Nombre: </strong>'.$fila['product_name'].'</h4><br>
                                <h4><strong>Precio: </strong>$'.number_format(($fila['buying_price']-($fila['buying_price']*($fila['profit']/100))), 2, '.', '').'</h4><br>
                                <h4><strong>Marca: </strong>'.$fila['model'].'</h4>';
                                
                                if($fila['image_path']!="" && is_file("./admin/".$fila['image_path'])){ 
                                    $imagenFile="./admin/".$fila['image_path']; 
                                }else{ 
                                    $imagenFile="./admin/img/default.png"; 
                                }
                                echo '<br>                              

                                <div class="payment-methods">
                                    <h2>Consultas</h2>
                                    <a href="https://wa.me/3704845568" target="_blank">
                                    <img src="./assets/icons/wsp.png" alt="WhatsApp" width="60" height="60"> </a>
                                </div>

                                <br>   

                                <div class="payment-methods">
                                    <h2>Medios de Pago</h2>
                                    <img src="./assets/img/mercadopago.jpg" alt="Medios de Pago">
                                </div>

                                <br>   

                                <a href="https://wa.me/3704845568" class="whatsapp-button" target="_blank">
                                    <img src="./assets/icons/wsp.png" alt="WhatsApp" width="30" height="30">
                                    Chat en WhatsApp
                                </a>

                            </div>


                            <div class="col-xs-12 col-sm-6">
                                <br><br><br>
                                <img class="img-responsive" src="'.$imagenFile.'">
                            </div>';
                    }
                ?>
            </div>
        </div>
    </section>

    <?php include './inc/footer.php'; ?>

</body>

</html>