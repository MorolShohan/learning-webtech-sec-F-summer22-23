document.addEventListener('DOMContentLoaded', function() {
  const showFeaturesButtons = document.querySelectorAll('.show-features-btn');
  const showSpecButtons = document.querySelectorAll('.show-spec-btn');

  showFeaturesButtons.forEach(button => {
    button.addEventListener('click', function() {
      const productID = button.getAttribute('data-product');
      const productFeaturesDiv = document.getElementById(productID + '-features');

      if (productFeaturesDiv.style.display === 'block') {
        productFeaturesDiv.style.display = 'none';
      } else {
        productFeaturesDiv.style.display = 'block';
      }
    });
  });

  showSpecButtons.forEach(button => {
    button.addEventListener('click', function() {
      const featureID = button.getAttribute('data-feature');
      const featureSpecsDiv = document.getElementById(featureID + '-specs');

      if (featureSpecsDiv.style.display === 'block') {
        featureSpecsDiv.style.display = 'none';
      } else {
        featureSpecsDiv.style.display = 'block';
      }
    });
  });
});