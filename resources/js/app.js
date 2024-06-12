import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

document.querySelectorAll('.form-delete').forEach(form => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const modalEl = form.querySelector('.my-modal');
        const modalElRun = form.querySelector('.modal-run');
        const modalElStop = form.querySelector('.modal-stop');

        // modalEl.style.display = "block";

        modalEl.classList.add('visible');
        console.log('submit');
        
        modalElStop.addEventListener('click', function(){
            modalEl.classList.remove('visible');
            console.log('click');
            // modalEl.classList.add('gfgfgfvisible');
            console.log(modalEl.classList);
            // modalEl.style.display = "none";
            
            // console.dir(modalEl.outerHTML);
            // modalEl.outerHTML = 
            // `
            // <div class="my-modal">
            //     <div class="modal-container">
            //         <h5 class="text-center me-5">Delete this project?</h5>
            //         <button class="btn btn-danger modal-run mx-5">Yes, Delete</button>
            //         <button class="btn btn-success modal-stop">No, Comeback</button>
            //     </div>
            // </div>
            // `
        });
        
        modalElRun.addEventListener('click', function(){
            
            form.submit();
        });


    })
})
