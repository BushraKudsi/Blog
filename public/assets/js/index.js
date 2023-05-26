$(document).ready(function() {
    $('.close-icon').on("click", function() {
      var clickedIcon = $(this)
      var postId = $(this).prev('.blog-title').attr('href').split('/post').pop();
      $.ajax({
        url: '/blog/post' + postId + '/delete',
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
        var mainPostID = url.split('/').pop();
        var subPostID = url.split('/')[4];
        console.log(mainPostID)
        console.log(subPostID)
        // var subPostId = $(this).prev('.blog-title').attr('href').split('/').pop();
        if (url.includes('subPost')) {
            $(this).attr("href", '/blog/' + subPostID + '/' + mainPostID+'/editSubPost')
        } else {
            $(this).attr("href", '/blog/' + mainPostID + '/edit')
        }

    })


    $('.back-btn').on("click", function() {
        var url = $(location).attr('href');
        var newUrl = url.substring(0, url.lastIndexOf('/'));
        window.location.href = newUrl;
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
  