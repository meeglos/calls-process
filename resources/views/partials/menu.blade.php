<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header">MENU</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="{{ route('calls.latest') }}"><i class="fa fa-link"></i> <span>Mostrar datos</span></a></li>
    <li><a href="{{ route('calls.insert') }}"><i class="fa fa-link"></i> <span>Insertar datos</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
        </ul>
    </li>
</ul>
<!-- /.sidebar-menu -->