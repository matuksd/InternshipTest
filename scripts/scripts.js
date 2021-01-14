
/**
 * Displays error message if user didnt fill his textbox field
 */
  document.getElementById("itemForm").addEventListener("submit", function(e){
      if(!checkSKU()){
            e.preventDefault();
        }
  });
  const validateFields = [
      'SKU',
      'Name',
      'Price',
  ];
  const attributeFields = [
     {'type' : 'DVD-disc','attr':'Size'},
     {'type' : 'Book','attr':'Weight'},
     {'type' : 'Furniture','attr':'Height'},
     {'type' : 'Furniture','attr':'Width'},
     {'type' : 'Furniture','attr':'Lenght'},
  ];
  function checkSKU() {
      let valid = true;
      validateFields.forEach(function(validItem) {
          if (document.querySelector('#'+validItem).value == "") {
              document.querySelector("#Empty"+validItem).style.display = "block";
              document.querySelector("#Empty"+validItem).style.color = 'red';
              valid = false;
          }
      });
      attributeFields.forEach(function(type) {
          if (document.querySelector('#'+type.attr).value == "" && document.getElementById("Switch").value == type.type) {
              document.querySelector("#Empty"+type.attr).style.display = "block";
              document.querySelector("#Empty"+type.attr).style.color = 'red';
              valid = false;
          }
      });
      return valid;
  }
  /**
   * Enables objects which user needs to see
   */
  function change()
  {
    var state=document.getElementById("Switch").value;
    if(state =="DVD-disc")
    {
      document.getElementById("B1").style.display = "block";
      document.getElementById("B2").style.display = "none";
      document.getElementById("B3").style.display = "none";
    }
    else if (state =="Furniture")
    {
      document.getElementById("B2").style.display = "block";
      document.getElementById("B1").style.display = "none";
      document.getElementById("B3").style.display = "none";
    }
    else if (state =="Book")
    {
      document.getElementById("B3").style.display = "block";
      document.getElementById("B1").style.display = "none";
      document.getElementById("B2").style.display = "none";
    }
  }