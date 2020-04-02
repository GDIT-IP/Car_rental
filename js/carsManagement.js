//Pass correct data into deletion confirmation dialog
$('#deleteCarModal').on('show.bs.modal', function (event) {
    const carId = $(event.relatedTarget).data('id');
    $(this).find("#carToDeleteId").attr("value", carId);
    $(this).find(".modal-body").find("#car-id").text(carId);
});
