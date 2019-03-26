<?php
    if(!function_exists('success_validate'))
        {
            function success_validate($message)
                {
                    return '<div class="hidden" id="id_succes">
                    <p class="alert alert-success">'.$message.'.</p>
                     <br>
                     <center> <button type="button" id="success_add" class="btn btn-warning" data-dismiss="modal"></span class="glyphicon glyphicon-remobe"></span>OK</button></center>
                               </div> ';
                }
        }
        if(!function_exists('errors_block'))
    {
        function errors_block()
             {
                 return "<p id='errors' class='alert alert-danger hidden'></p>";
             }
    }