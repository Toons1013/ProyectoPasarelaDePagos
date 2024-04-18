<h2>Listado de Categorías</h2>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Status</th>
                <th>
                    {{if products_new_enabled}}
                    <a href="index.php?page=Productosdigitales_ProductosForm&mode=INS" class="btn">
                        Nuevo
                    </a>
                    {{endif products_new_enabled}}
                </th>
            </tr>
        </thead>
        <tbody>
            {{foreach products}}
            <tr>
                <td>{{productId}}</td>
                <td>{{productName}}</td>
                <td>{{productStatus}}</td>
                <td>
                    {{if ~products_view_enabled}}
                    <a href="index.php?page=Productosdigitales_ProductosForm&mode=DSP&productId={{productId}}">
                        Ver
                    </a>&nbsp;
                    {{endif ~products_view_enabled}}
                    {{if ~products_edit_enabled}}
                    <a href="index.php?page=Productosdigitales_ProductosForm&mode=UPD&productId={{productId}}">
                        Editar
                    </a>&nbsp;
                    {{endif ~products_edit_enabled}}
                    {{if ~products_delete_enabled}}
                    <a href="index.php?page=Productosdigitales_ProductosForm&mode=DEL&productId={{productId}}">
                        Eliminar
                    </a>&nbsp;
                    {{endif ~products_delete_enabled}}
                </td>
            </tr>
            {{endfor products}}
        </tbody>
    </table>
</section>