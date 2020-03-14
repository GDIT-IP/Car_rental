// This function populates brand and model dropdowns
window.onload = function () {
    // modelsMap is an object but you can think of it as a lookup table
    var modelsMap = modelsJson,
        // just grab references to the two drop-downs
        brand_select = document.querySelector('#brand'),
        model_select = document.querySelector('#model');

    // populate the brands drop-down
    setOptions(brand_select, Object.keys(modelsMap));
    // populate the models drop-down
    setOptions(model_select, modelsMap[brand_select.value]);

    // add a change event listener to the provinces drop-down
    brand_select.addEventListener('change', function () {
        // get the models of the selected brand
        setOptions(model_select, modelsMap[brand_select.value]);
    });

    function setOptions(dropdown, options) {
        // clear out any existing values
        dropdown.innerHTML = '';
        // insert the new options into the drop-down
        options.forEach(function (value) {
            dropdown.innerHTML += '<option name="' + value + '">' + value + '</option>';
        });
    }
};
