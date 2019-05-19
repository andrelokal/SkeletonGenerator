      
        <!-- Grid de Pessoa -->
        <table id="dgPessoa" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgPessoa" >
            <form id="fmPessoa" method="post"novalidate> 
                <div class="fitem">
                    <label>Status:</label>
                    <input name="status" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Tipo:</label>
                    <input name="tipo" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Rua:</label>
                    <input name="rua" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Numero:</label>
                    <input name="numero" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Bairro:</label>
                    <input name="bairro" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Cidade:</label>
                    <input name="cidade" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Uf:</label>
                    <input name="uf" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Cep:</label>
                    <input name="cep" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Pais:</label>
                    <input name="pais" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Telefone:</label>
                    <input name="telefone" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Email:</label>
                    <input name="email" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Dt_atualizacao:</label>
                    <input name="dt_atualizacao" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Dt_cadastro:</label>
                    <input name="dt_cadastro" class="easyui-textbox" required="false">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/pessoaController.php?action=get_data";
            var dataGridID = "dgPessoa";
            var dataDialogID = "dlgPessoa";
            var dataFormID = "fmPessoa";
            var path = "../control/pessoaController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        