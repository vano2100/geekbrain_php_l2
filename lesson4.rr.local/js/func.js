var page = 1;
function loadGoods(){
  axios.get('/index.php?action=load&page='+page)
  .then(function (response) {
    // handle success
    if (response.data.length > 0){
      for (var iterator = 0; iterator < response.data.length; iterator ++){
        document.getElementById('goods').innerHTML+='  <div class="col-md-4">'+
    '<h2>'+response.data[iterator]["name"]+'</h2><p>'+ response.data[iterator]["price"]+'</p></div>';
      }
      
    }    
    page += 1;
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .finally(function () {
    // always executed
  });  
}

