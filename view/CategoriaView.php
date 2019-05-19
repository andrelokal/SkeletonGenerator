      
        <!-- Grid de Categoria -->
        <table id="dgCategoria" style="height:100%"></table>    

        <!-- Form de Alteração -->
        <div id="dlgCategoria" >
            <form id="fmCategoria" method="post"novalidate> 
                <div class="fitem">
                    <label>Nome:</label>
                    <input name="nome" class="easyui-textbox" required="true">
                </div>
            </form>
        </div>

        <script>

            var pathData = "../control/categoriaController.php?action=get_data";
            var dataGridID = "dgCategoria";
            var dataDialogID = "dlgCategoria";
            var dataFormID = "fmCategoria";
            var path = "../control/categoriaController.php";

            $(function(){
                dataGridReacall(pathData,dataGridID);
                dialogRecall(dataDialogID,400,200);
            });

        </script>
        