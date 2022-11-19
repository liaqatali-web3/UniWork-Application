
  $(document).ready(function(){
  $("#firstform").on("submit",function(e){
    e.preventDefault();
    var formdata=new FormData(this);
      $.ajax({
        url:"../BackendLogic/sellerlogic/profile_logic/profile_update.php",
        type:"POST",
        data:formdata,
        contentType:false,
        processData:false,
        success:function(data){
          
          $("#firstform").html(data);
          
        }

      });

  });//first form end

  ///////////////////////////////////////////////////////

  $("#DescriptionUpdate").on("click",function(){

    var description=$("#DescriptionArea").val();

    $.ajax({

      url:"../BackendLogic/sellerlogic/profile_logic/description.php",
      type:"POST",
      data:{"description":description},
      success:function(data)
      {
          $("#DescriptionArea").html(data);        
      }

    });
  
  });//description end



  //add new language.
    $("#LanguageUpdate").on("click",function(){

      var language=$("#language").val();
      var level=$("#level").val();


      $.ajax({
      url:"../BackendLogic/sellerlogic/profile_logic/language.php",
      type:"POST",
      data:{"language":language,"level":level},
      success:function(data)
      {

        $("#languagetable").html(data);
      }

      });


    });//add language end



    //delete language
    $(document).on("click",'.btn-delete',function(){

      var value=$(this).data("id");
      $.ajax({
      url:"../BackendLogic/sellerlogic/profile_logic/language_delete.php",
      type:"POST",
      data:{"id":value},
      success:function(data)
      {
        $("#languagetable").html(data); 
      }
      });
    });// end of deleting laguage.



  //add new skill.
    $("#sUpdate").on("click",function(){

      var skill=$("#skill").val();
      var experience=$("#experience").val();


      $.ajax({
      url:"../BackendLogic/sellerlogic/profile_logic/skill.php",
      type:"POST",
      data:{"skill":skill,"experience":experience},
      success:function(data)
      {
        $("#skilltable").html(data);
      }

      });


    });//add skill end



    //delete skill
    $(document).on("click",'.btn-delete-skill',function(){

      var value=$(this).data("id");
      $.ajax({
      url:"../BackendLogic/sellerlogic/profile_logic/skill_delete.php",
      type:"POST",
      data:{"id":value},
      success:function(data)
      {
        $("#skilltable").html(data); 
      }
      });
    });// end of deleting skill.



        //add new education.
        $("#eUpdate").on("click",function(){

        var major=$("#major").val();
        var title=$("#title").val();
        var year=$("#year").val();

        $.ajax({
        url:"../BackendLogic/sellerlogic/profile_logic/education.php",
        type:"POST",
        data:{"title":title,"major":major,"year":year},
        success:function(data)
        {

          $("#educationtable").html(data);
        }

        });


        });//add skill end



        //delete skill
        $(document).on("click",'.btn-delete-education',function(){

        var value=$(this).data("id");
        $.ajax({
        url:"../BackendLogic/sellerlogic/profile_logic/education_delete.php",
        type:"POST",
        data:{"id":value},
        success:function(data)
        {
          $("#educationtable").html(data); 
        }
        });
        });// end of deleting skill.




                //add new education.
        $("#eUpdate").on("click",function(){

        var major=$("#major").val();
        var title=$("#title").val();
        var year=$("#year").val();

        $.ajax({
        url:"../BackendLogic/sellerlogic/profile_logic/education.php",
        type:"POST",
        data:{"title":title,"major":major,"year":year},
        success:function(data)
        {

          $("#educationtable").html(data);
        }

        });


        });//add skill end



        //delete skill
        $(document).on("click",'.btn-delete-education',function(){

        var value=$(this).data("id");
        $.ajax({
        url:"../BackendLogic/sellerlogic/profile_logic/education_delete.php",
        type:"POST",
        data:{"id":value},
        success:function(data)
        {
          $("#educationtable").html(data); 
        }
        });
        });// end of deleting skill.



        //add new Certificate.
        $("#cUpdate").on("click",function(){

        var certificate=$("#certificate").val();
        var from=$("#from").val();
        var year=$("#cyear").val();
          console.log(year);
        $.ajax({
        url:"../BackendLogic/sellerlogic/profile_logic/certificate.php",
        type:"POST",
        data:{"certificate":certificate,"from":from,"year":year},
        success:function(data)
        {

          $("#certificatetable").html(data);
        }

        });


        });//add skill end



        //delete skill
        $(document).on("click",'.btn-delete-certificate',function(){

        var value=$(this).data("id");
        $.ajax({
        url:"../BackendLogic/sellerlogic/profile_logic/certificate_delete.php",
        type:"POST",
        data:{"id":value},
        success:function(data)
        {
          $("#certificatetable").html(data); 
        }
        });
        });// end of deleting skill.


  });//end of main.

