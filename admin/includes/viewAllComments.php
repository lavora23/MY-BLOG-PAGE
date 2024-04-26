<table class='table table-bordered table-hover'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Auteur</th>
            <th>Commentaires</th>
            <th>Email</th>
            <th>Status</th>
            <th>Réponse à</th>
            <th>Date</th>  
            <th>Approuver</th>
            <th>Désapprouver</th>     
        </tr>
    </thead>

    <tbody>
        <?php 
            selectAllComments();
            deleteComment();
        ?>
        
    </tbody>
</table>


<?php
unapproveComment(); 
approveComment();
?>