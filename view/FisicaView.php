      
        <!-- Grid de Fisica -->
        <table id="dgFisica" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgFisica" >
            <form id="fmFisica" method="post"novalidate> 
                <div class="fitem">
                    <label>Pessoa_id:</label>
                    <input name="pessoa_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Cpf:</label>
                    <input name="cpf" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Nome:</label>
                    <input name="nome" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Rg:</label>
                    <input name="rg" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Dt_nascimento:</label>
                    <input name="dt_nascimento" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Sexo:</label>
                    <input name="sexo" class="easyui-textbox" required="false">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/fisicaController.php?action=get_data";
            var dataGridID = "dgFisica";
            var dataDialogID = "dlgFisica";
            var dataFormID = "fmFisica";
            var path = "../control/fisicaController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        