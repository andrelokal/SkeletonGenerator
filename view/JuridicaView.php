      
        <!-- Grid de Juridica -->
        <table id="dgJuridica" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgJuridica" >
            <form id="fmJuridica" method="post"novalidate> 
                <div class="fitem">
                    <label>Pessoa_id:</label>
                    <input name="pessoa_id" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Cnpj:</label>
                    <input name="cnpj" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Razao_social:</label>
                    <input name="razao_social" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Nome_fantasia:</label>
                    <input name="nome_fantasia" class="easyui-textbox" required="true">
                </div>

                <div class="fitem">
                    <label>Inscricao_estadual:</label>
                    <input name="inscricao_estadual" class="easyui-textbox" required="false">
                </div>

                <div class="fitem">
                    <label>Ccm:</label>
                    <input name="ccm" class="easyui-textbox" required="false">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/juridicaController.php?action=get_data";
            var dataGridID = "dgJuridica";
            var dataDialogID = "dlgJuridica";
            var dataFormID = "fmJuridica";
            var path = "../control/juridicaController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        