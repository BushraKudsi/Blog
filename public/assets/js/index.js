$(document).ready(function() {
    $('.close-icon').on("click", function() {
      var clickedIcon = $(this)
      var postId = $(this).prev('.blog-title').attr('href').split('/post/').pop();
      console.log(postId)
      $.ajax({
        url: '/post' + '/delete/' +postId ,
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          console.log("Post deleted successfully!");
          clickedIcon.closest('.post-link').remove();
          clickedIcon.remove();
        },
        error: function(xhr, status, error) {
          console.error("Error deleting post:", error);
        }
      });
    });



    $('.edit-btn').on('click',function(){
        var url = $(location).attr('href');
        var id = url.split('/').slice(-1);
        window.location = '/post/edit/' +id;
    })


    $('.back-btn').on("click", function() {
        // var url = $(location).attr('href');
        // var lastPart = url.split('/').slice(-2);
        // var newUrl = url.replace(lastPart, "/blog");  
        window.location.href = '/blog/';
        return false;
    });

    $('.search-btn').on("click", function() {
       title = $(".search-text" ).val();
       if(title){
           $.ajax({
            url: '/blog/search/'+title,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              console.log("filter !");
              console.log(response)
 
              $('.post-ul').empty();

              $.each(response.posts, function(index, post) {
         
                  var liElement = $('<li></li>').html(
                      '<a class="blog-title" href="./blog/post' + post.id + '">' + (post.title) + '</a>' +
                      '<span class="close-icon">x</span>'
                  );
          
                  $('.post-ul').append(liElement);
              });
            },
            error: function(xhr, status, error, response) {
              console.log(response)

            }
          });
       }
       
    });





  });
  