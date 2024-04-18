<h2>{{modeDesc}}</h2>
<section>
    {{if hasErrors}}
    <div class="error">
        <ul>
            {{with errors}}
            {{foreach global}}
            <li>{{this}}</li>
            {{endfor global}}
            {{endwith errors}}
        </ul>
    </div>
    {{endif hasErrors}}
    <form class="grid" action="index.php?page=Productosdigitales_ProductosForm&mode={{mode}}&productId={{productId}}"
        method="post">
        <input type="hidden" name="productId" value="{{productId}}">
        <input type="hidden" name="mode" value="{{mode}}">
        <input type="hidden" name="crf_token" value="{{crf_token}}">
        <div class="row">
            <label class="col-3 offset-2" for="productId">ID</label>
            <input class="col-5" type="text" name="productId" id="productId" value="{{productId}}" disabled>
        </div>
        <div class="row">
            <label class="col-3 offset-2" for="productName">Producto</label>
            <input class="col-5" type="text" {{isReadOnly}} name="productName" id="productName"
                value="{{productName}}">
            {{if hasErrors}}
            <div class="error col-5 offset-5">
                {{with errors}}
                {{foreach productName_error}}
                {{this}}<br />
                {{endfor productName_error}}
                {{endwith errors}}
            </div>
            {{endif hasErrors}}
        </div>
        <div class="row">
            <label class="col-3 offset-2" for="productDescription">Descripcion</label>
            <input class="col-5" type="text" {{isReadOnly}} name="productDescription" id="productDescription"
                value="{{productDescription}}">
            {{if hasErrors}}
            <div class="error col-5 offset-5">
                {{with errors}}
                {{foreach productDescription_error}}
                {{this}}<br />
                {{endfor productDescription_error}}
                {{endwith errors}}
            </div>
            {{endif hasErrors}}
        </div>
        <div class="row">
            <label class="col-3 offset-2" for="productPrice">Precio</label>
            <input class="col-5" type="number" {{isReadOnly}} name="productPrice" id="productPrice"
                value="{{productPrice}}">
            {{if hasErrors}}
            <div class="error col-5 offset-5">
                {{with errors}}
                {{foreach productPrice_error}}
                {{this}}<br />
                {{endfor productPrice_error}}
                {{endwith errors}}
            </div>
            {{endif hasErrors}}
        </div>
        <div class="row">
            <label class="col-3 offset-2" for="productImgUrl">URL de Imagen del Producto</label>
            <input class="col-5" type="text" {{isReadOnly}} name="productImgUrl" id="productImgUrl"
                value="{{productImgUrl}}">
            {{if hasErrors}}
            <div class="error col-5 offset-5">
                {{with errors}}
                {{foreach productImgUrl_error}}
                {{this}}<br />
                {{endfor productImgUrl_error}}
                {{endwith errors}}
            </div>
            {{endif hasErrors}}
        </div>
        <div class="row">
            <label class="col-3 offset-2" for="productStatus">Status</label>
            <select class="col-5" id="productStatus" name="productStatus" {{if isReadOnly}} disabled readonly
                {{endif isReadOnly}}>
                {{foreach productStatus_list}}
                <option value="{{value}}" {{selected}}>{{text}}</option>
                {{endfor productStatus_list}}
            </select>
        </div>
        <div class="row">
            <div class="col-5 offset-5">
                {{if showAction}}
                <button type="submit" name="btnGuardar" id="btnGuardar">Guardar</button>
                &nbsp;
                {{endif showAction}}
                <button name="btnCancelar" id="btnCancelar">Cancelar</button>
            </div>
        </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnCancelar = document.getElementById('btnCancelar');
        btnCancelar.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = 'index.php?page=Productosdigitales_ProductosList';
        });
    });
</script>