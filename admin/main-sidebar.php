<?php 
 if (isset($_SESSION['user_id'])){

?>
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/admin.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['full_name']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENÚ</li>
            <li class="<?php if (isset($home) and $home==1){echo "active";}?>">
              <a href="index.php">
                <i class="fa fa-home"></i> <span>Inicio</span> 
              </a>
              
            </li>
			<?php 
				permisos_menu('Compras',$cadena_permisos);
				if ($permisos_ver_menu==1){
			?>
            <li class="<?php if (isset($purchases) and $purchases==1){echo "active";}?> treeview">
              <a href="#">
                <i class="fa fa-truck"></i>
                <span>Compras</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if (isset($purchase_add) and $purchase_add==1){echo "active";}?>"><a href="new_purchase.php"><i class="glyphicon glyphicon-shopping-cart"></i> Nueva compra</a></li>
				<li class="<?php if (isset($purchase_list) and $purchase_list==1){echo "active";}?>"><a href="purchase_list.php"><i class="glyphicon glyphicon-th-list"></i> Historial de compras</a></li>
			  </ul>
            </li>
			<?php } ?>
			<?php 
				permisos_menu('Productos',$cadena_permisos);
				if ($permisos_ver_menu==1){
			?>
			<li class="<?php if (isset($products) and $products==1){echo "active";}?>">
              <a href="products.php">
                <i class="glyphicon glyphicon-th-large"></i> <span>Productos</span>
              </a>
            </li>
			<?php } ?>
			<?php 
				permisos_menu('Fabricantes',$cadena_permisos);
				if ($permisos_ver_menu==1){
			?>
			<li class="<?php if (isset($manufacturers) and $manufacturers==1){echo "active";}else {echo "";}?>">
              <a href="manufacturers.php">
                <i class="glyphicon glyphicon-calendar"></i> <span>Fabricantes</span>
              </a>
            </li>
			<?php } ?>
			<?php 
				permisos_menu('Clientes',$cadena_permisos);
				$permisos_clientes=$permisos_ver_menu;
				permisos_menu('Proveedores',$cadena_permisos);
				$permisos_proveedores=$permisos_ver_menu;
				if ($permisos_clientes==1 or $permisos_proveedores==1){
			?>
            <li class="<?php if (isset($contacts) and $contacts==1){echo "active";}?> treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Contactos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
			<?php 
				if ($permisos_clientes==1){
			?>	
                <li class="<?php if (isset($customers) and $customers==1){echo "active";}?>"><a href="customers.php"><i class="glyphicon glyphicon-user"></i> Clientes</a></li>
			<?php } ?>
			<?php 
				if ($permisos_proveedores==1){
			?>	
                <li class="<?php if (isset($suppliers) and $suppliers==1){echo "active";}?>"><a href="supplier.php"><i class="glyphicon glyphicon-briefcase"></i> Proveedores</a></li>
			<?php } ?>	
              </ul>
            </li>
			<?php } ?>
			<?php 
				permisos_menu('Ventas',$cadena_permisos);
				if ($permisos_ver_menu==1){
			?>
            <li class="<?php if (isset($sales) and $sales==1){echo "active";}?> treeview">
              <a href="#">
                <i class="fa fa-dollar"></i> <span>Facturación</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if (isset($sale_add) and $sale_add==1){echo "active";}?>"><a href="new_sale.php"><i class="fa fa-cart-plus"></i> Nueva venta</a></li>
                <li class="<?php if (isset($sale_list) and $sale_list==1){echo "active";}?>"><a href="manage_invoice.php"><i class="glyphicon glyphicon-list-alt"></i> Administrar facturas</a></li>
              </ul>
            </li>
			<?php } ?>
			<?php 
				permisos_menu('Reportes',$cadena_permisos);
				if ($permisos_ver_menu==1){
			?>
            <li class="<?php if (isset($reports) and $reports==1){echo "active";}?> treeview">
              <a href="#">
                <i class="glyphicon glyphicon-signal"></i> <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if (isset($sales_report) and $sales_report==1){echo "active";}?>"><a href="sales_report.php"><i class="fa fa-bar-chart"></i> Reporte de ventas</a></li>
				<li class="<?php if (isset($purchases_report) and $purchases_report==1){echo "active";}?>"><a href="purchases_report.php"><i class="fa fa-line-chart"></i> Reporte de compras</a></li>
				<li class="<?php if (isset($inventory_report) and $inventory_report==1){echo "active";}?>"><a href="inventory_report.php"><i class="fa fa-bar-chart"></i> Reporte de inventario</a></li>
			 </ul>
            </li>
			<?php } ?>
			<?php 
				permisos_menu('Configuracion',$cadena_permisos);
				if ($permisos_ver_menu==1){
			?>
			<li class="<?php if (isset($config) and $config==1){echo "active";}else {echo "";}?> treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Configuración</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if (isset($business_profile) and $business_profile==1){echo "active";}else {echo "";}?>"><a href="business_profile.php"><i class="glyphicon glyphicon-briefcase"></i> Perfil de la empresa</a></li>
               <li style="display: none;"> class="<?php if (isset($currencies) and $currencies==1){echo "active";}else {echo "";}?>"><a href="currencies.php"><i class="fa fa-usd"></i> Monedas</a></li>
			   <li style="display: none;" class="<?php if (isset($templates) and $templates==1){echo "active";}else {echo "";}?>"><a href="templates.php"><i class="fa fa-file-pdf-o"></i> Plantillas</a></li>
              </ul>
            </li>
			<?php } ?>
			<?php 
				permisos_menu('Permisos',$cadena_permisos);
				$permisos_grupos=$permisos_ver_menu;
				permisos_menu('Usuarios',$cadena_permisos);
				$permisos_usuarios=$permisos_ver_menu;
				if ($permisos_grupos==1 or $permisos_usuarios==1){
			?>
			<li class="<?php if (isset($access) and $access==1){echo "active";}else {echo "";}?> treeview">
              <a href="#">
                <i class="fa fa-lock"></i> <span>Administrar accesos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
			<?php 
				if ($permisos_grupos==1){
			?>  
                <li class="<?php if (isset($groups) and $groups==1){echo "active";}else {echo "";}?>"><a href="group_list.php"><i class="glyphicon glyphicon-briefcase"></i> Perfil de usuarios</a></li>
			<?php } ?>	
			<?php 
				if ($permisos_usuarios==1){
			?>
				<li class="<?php if (isset($users) and $users==1){echo "active";}else {echo "";}?>"><a href="user_list.php"><i class="fa fa-users"></i> Usuarios</a></li>
			<?php } ?>	
              </ul>
            </li>
            <?php } ?>
            
           
          </ul>
        </section>
        <!-- /.sidebar -->
		<?php
 }
		?>