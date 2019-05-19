      
        <!-- Grid de Acesso -->
        <table id="dgAcesso" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgAcesso" >
            <form id="fmAcesso" method="post"novalidate> 
                <div class="fitem">
                    <label>Modulo_id:</label>
                    <input name="modulo_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Funcionario_id:</label>
                    <input name="funcionario_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Nivel_acesso:</label>
                    <input name="nivel_acesso" class="easyui-textbox" required="true">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/acessoController.php?action=get_data";
            var dataGridID = "dgAcesso";
            var dataDialogID = "dlgAcesso";
            var dataFormID = "fmAcesso";
            var path = "../control/acessoController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        