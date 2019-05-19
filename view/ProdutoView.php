      
        <!-- Grid de Produto -->
        <table id="dgProduto" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgProduto" >
            <form id="fmProduto" method="post"novalidate> 
                <div class="fitem">
                    <label>Codigo:</label>
                    <input name="codigo" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Codbar:</label>
                    <input name="codbar" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Categoria:</label>
                    <input name="categoria_id" id="categoria_id" class="easyui-combobox" required="true" style="width:200px;">
                </div>
                
                <div class="fitem">
                    <label>Unidade:</label>
                    <input id="unidade_id" class="easyui-combobox" name="unidade_id" required="true" style="width:200px;">
                </div>

                <div class="fitem">
                    <label>Nome:</label>
                    <input name="nome" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Descricao:</label>
                    <input name="descricao" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Valor:</label>
                    <input name="valor" class="easyui-textbox" required="true">
                </div>

            </form>
        </div>

        <script>

            var pathData = "../control/produtoController.php?action=get_data";
            var dataGridID = "dgProduto";
            var dataDialogID = "dlgProduto";
            var dataFormID = "fmProduto";
            var path = "../control/produtoController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,300);
                
                
                //Combobox de unidades
                $('#unidade_id').combobox({
                    url:'../control/unidadeController.php?action=get_all',
                    valueField:'id',
                    textField:'text'
                });
                
                $('#categoria_id').combobox({
                    url:'../control/categoriaController.php?action=get_all',
                    valueField:'id',
                    textField:'text'
                });
                
                
            });
            
            

        </script>
        