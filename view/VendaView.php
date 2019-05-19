      
        <!-- Grid de Venda -->
        <table id="dgVenda" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgVenda" >
            <form id="fmVenda" method="post"novalidate> 
                <div class="fitem">
                    <label>Cliente_id:</label>
                    <input name="cliente_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Desconto:</label>
                    <input name="desconto" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Total:</label>
                    <input name="total" class="easyui-textbox" required="true">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/vendaController.php?action=get_data";
            var dataGridID = "dgVenda";
            var dataDialogID = "dlgVenda";
            var dataFormID = "fmVenda";
            var path = "../control/vendaController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        