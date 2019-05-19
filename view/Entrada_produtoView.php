      
        <!-- Grid de Entrada_produto -->
        <table id="dgEntrada_produto" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgEntrada_produto" >
            <form id="fmEntrada_produto" method="post"novalidate> 
                <div class="fitem">
                    <label>Produto_id:</label>
                    <input name="produto_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Fornecedor_id:</label>
                    <input name="fornecedor_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Quantidade:</label>
                    <input name="quantidade" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Lote:</label>
                    <input name="lote" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Dt_compra:</label>
                    <input name="dt_compra" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Dt_validade:</label>
                    <input name="dt_validade" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Valor_unitario:</label>
                    <input name="valor_unitario" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Valor_total:</label>
                    <input name="valor_total" class="easyui-textbox" required="false">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/entrada_produtoController.php?action=get_data";
            var dataGridID = "dgEntrada_produto";
            var dataDialogID = "dlgEntrada_produto";
            var dataFormID = "fmEntrada_produto";
            var path = "../control/entrada_produtoController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        