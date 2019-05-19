      
        <!-- Grid de Itens_venda -->
        <table id="dgItens_venda" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgItens_venda" >
            <form id="fmItens_venda" method="post"novalidate> 
                <div class="fitem">
                    <label>Venda_id:</label>
                    <input name="venda_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Produto_id:</label>
                    <input name="produto_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Quantidade:</label>
                    <input name="quantidade" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Valor_unitario:</label>
                    <input name="valor_unitario" class="easyui-textbox" required="false">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/itens_vendaController.php?action=get_data";
            var dataGridID = "dgItens_venda";
            var dataDialogID = "dlgItens_venda";
            var dataFormID = "fmItens_venda";
            var path = "../control/itens_vendaController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        