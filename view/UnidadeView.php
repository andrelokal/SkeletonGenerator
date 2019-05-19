      
        <!-- Grid de Unidade -->
        <table id="dgUnidade" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgUnidade" >
            <form id="fmUnidade" method="post"novalidate> 
                <div class="fitem">
                    <label>Descricao:</label>
                    <input name="descricao" class="easyui-textbox" required="true">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/unidadeController.php?action=get_data";
            var dataGridID = "dgUnidade";
            var dataDialogID = "dlgUnidade";
            var dataFormID = "fmUnidade";
            var path = "../control/unidadeController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        