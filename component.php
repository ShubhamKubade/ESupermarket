<?php

function component($contentId, $CName, $Price, $Quantity, $Details){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                       
                        <div class=\"card-body\">
                            <span class=\"card-title\">$CName</span>
                            </h5>
                            <p class=\"card-text\">$Details</p>
                            <p class=\"card-text\">Price ₹ $Price</p>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='contentId' value='$contentId'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($contentId, $CName, $Price, $Quantity, $Details){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$contentId\" method=\"post\" class=\"cart-items\">
    <div class=\"border rounded\">
    <div class=\"row bg-white\">
        
        <div class=\"col-md-6\">
            <h5 class=\"pt-2\">$CName</h5>
            <h5 class=\"pt-2\">Price: ₹ $Price</h5>
            <h5 class=\"pt-2\">Details: $Details</h5>

            <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
            <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
        </div>
        <div class=\"col-md-3 py-5\">
           
        </div>
    </div>
</div>  
                </form>
    
    ";
    echo  $element;
}
















