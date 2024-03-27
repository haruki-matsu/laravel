function syncFiles(sourceInput, targetInputId) {
    var targetInput = document.getElementById(targetInputId);
    targetInput.files = sourceInput.files;
}