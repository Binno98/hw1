document.addEventListener("DOMContentLoaded", function() {
    const searchForm = document.getElementById('search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(event) {
            event.preventDefault(); 
            const formData = new FormData(searchForm);
            let model = formData.get('model');
            let attemptWithSpace = false;

            function searchModel(currentModel) {
                fetch(`search_content.php?model=${encodeURIComponent(currentModel)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error(data.error);
                        } else if (data.length === 0 && !attemptWithSpace) {
                            attemptWithSpace = true;
                            const newModel = currentModel.includes(' ') ? currentModel.replace(' ', '') : currentModel.slice(0, 1) + ' ' + currentModel.slice(1);
                            searchModel(newModel);
                        } else {
                            const container = document.querySelector('.itemContainer');
                            if (data.length === 0) {
                                container.innerHTML = `<p>No results found for model: ${model}</p>`;
                            } else {
                                container.innerHTML = `
                                    <h2>Search Result</h2>
                                    <p>Make: ${data[0].make}</p>
                                    <p>Model: ${data[0].model}</p>
                                    <p>Year: ${data[0].year}</p>
                                    <p>Displacement: ${data[0].displacement} cc</p>
                                    <p>Power: ${data[0].power} hp</p>
                                `;
                                
                                const containerOffset = container.getBoundingClientRect().top + window.pageYOffset;
                                window.scrollTo({
                                    top: containerOffset,
                                    behavior: "smooth"
                                });
                            }
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            if (model) {
                searchModel(model);
            }
        });
    }
});
