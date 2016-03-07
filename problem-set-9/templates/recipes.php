<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
    <div class="input-pad">
        <span id="add-glyph">
            <span class="glyphicon glyphicon-plus"></span>
            <span><label>Add Recipe</label></span> 
        </span>          
    </div>
    
    <div id="deleteform" class="hidden">
        <form action="delete_recipe.php" method="post">
            <div id="canceldelete" class="input-pad">
                    <span class="glyphicon glyphicon-remove"></span>
                    <span><label>Cancel</label></span>
                </div>
            
            
            <div class="input-group input-pad">
                <input id="rectodel" class="form-control" name="recipe" type="text">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-remove"></span>
                </div>
                
            </div>
            <div class="input-group input-pad">
            
                <button type="submit" class="btn btn-default form-control">Delete</button>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-remove"></span>
                </div>
            </div> 
        </form>  
    </div>
        
    <div id="addform" class="hidden">
        <form action="recipe_handler.php" method="post">
            <div id="canceladd" class="input-pad">
                    <span class="glyphicon glyphicon-remove"></span>
                    <span><label>Cancel</label></span>
                </div>
            <div class="input-group input-pad">
                <input class="form-control" name="recipe" placeholder="Name of Recipe" type="text">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-tag"></span>
                </div>
                
            </div>
            
        
            <div class="input-group input-pad">
                <div class="input-group-addon">
                    <label for="ingredients" >Ingredients:</label>
                </div>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="10" maxlength="250"></textarea>
            </div>
            
            <div class="input-group input-pad">
                <div class="input-group-addon">
                    <label for="directions" >Directions:</label>
                </div>
                <textarea class="form-control" id="directions" name="directions" rows="10"></textarea>
            </div>
        
            <div class="input-group input-pad">
                <button type="submit" class="btn btn-default form-control">Submit</button>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-ok"></span>
                </div>
            </div> 
        </form>  
    </div>
    
    <div id="editform" class="hidden">
        <form action="edit_recipe.php" method="post">
            <div id="canceledit" class="input-pad">
                <span class="glyphicon glyphicon-remove"></span>
                <span><label>Cancel</label></span>
            </div>
            
            <div class="input-group input-pad">
                <input id="editinput" class="form-control" name="recipe" placeholder="Name of Recipe" type="text">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-tag"></span>
                </div>
            </div>
        
            <div class="input-group input-pad">
                <div class="input-group-addon">
                    <label for="ingredients" >Ingredients:</label>
                </div>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="10" maxlength="250"></textarea>
            </div>
            
            <div class="input-group input-pad">
                <div class="input-group-addon">
                    <label for="directions" >Directions:</label>
                </div>
                <textarea class="form-control" id="directions" name="directions" rows="10" maxlength="250"></textarea>
            </div>
        
            <div class="input-group input-pad">
                <button type="submit" class="btn btn-default form-control">Submit</button>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-ok"></span>
                </div>
            </div> 
        </form>  
    </div>
    
    
    
    <div id="recipe-table" class="input-pad"> 
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Recipe</th>
                    <th>Ingredients</th>
                    <th>Directions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($recipes as $recipe): ?>
                     
                    <tr>
                        
                        <td><?= $recipe['recipe'] ?></td>
                        <td><?= $recipe['ingredients'] ?></td>
                        <td><?= $recipe['directions'] ?></td>
                        <td onclick="$('.<?= 'second' . $recipe['recipe_id'] ?>').toggleClass('hidden')"><span class="glyphicon glyphicon-cog"></span></td>
                    </tr> 
                    <tr class="<?= 'second' . $recipe['recipe_id'] ?> delete-edit hidden">
                        
                            <td class="deleter" colspan="2"><span class="glyphicon glyphicon-remove"></span>
                            <div onclick="
                                if($('#deleteform').hasClass('hidden')){
                                    $('#deleteform').removeClass('hidden');
                                    $('#addform').addClass('hidden');
                                    $('#editform').addClass('hidden');
                                }
                                $('#rectodel').val('<?= $recipe['recipe'] ?>');
                                $('.<?= 'second' . $recipe['recipe_id'] ?>').toggleClass('hidden');
                            ">Delete</div></td>
                            
                            
                            <td><span class="glyphicon glyphicon-pencil"></span><div onclick="
                                if($('#editform').hasClass('hidden')){
                                    $('#editform').removeClass('hidden');
                                    $('#addform').addClass('hidden');
                                    $('#deleteform').addClass('hidden');   
                                }
                                $('.<?= 'second' . $recipe['recipe_id'] ?>').toggleClass('hidden');
                                $('#editinput').val('<?= $recipe['recipe'] ?>');
                                $('textarea#ingredients').val('<?= $recipe['ingredients'] ?>');
                                $('textarea#directions').val('<?= $recipe['directions'] ?>');
                                ">Edit</div></td>
                        <td></td>
                    </tr>
                   
                <?php endforeach ?>
            </tbody>
        </table>  
    </div> 
</div>
