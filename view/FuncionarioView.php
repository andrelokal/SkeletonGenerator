      
        <!-- Grid de Funcionario -->
        <table id="dgFuncionario" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgFuncionario" >
            <form id="fmFuncionario" method="post"novalidate> 
                <div class="fitem">
                    <label>Pessoa_id:</label>
                    <input name="pessoa_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Login:</label>
                    <input name="login" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Senha:</label>
                    <input name="senha" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Email:</label>
                    <input name="email" class="easyui-textbox" required="true">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/funcionarioController.php?action=get_data";
            var dataGridID = "dgFuncionario";
            var dataDialogID = "dlgFuncionario";
            var dataFormID = "fmFuncionario";
            var path = "../control/funcionarioController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        