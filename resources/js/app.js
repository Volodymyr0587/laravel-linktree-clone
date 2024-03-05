import axios from 'axios';
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// $('.user-link').click(function(e) {

//     let linkId = $(this).data('link-id');
//     let linkUrl = $(this).attr('href');
//     axios.post('/visit/' + linkId, {
//         link: linkUrl
//     })
//         .then(response => console.log('response: ', response))
//         .catch(error => console.error('error: ', error));
// });


document.querySelectorAll('.user-link').forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault(); // Prevent default link behavior

      const linkId = link.dataset.linkId;
      const linkUrl = link.getAttribute('href');

      axios.post('/visit/' + linkId, { link: linkUrl }, {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      })
      .then(response => {
        // Handle successful response (e.g., display success message)
        console.log('Visit recorded successfully!');
      })
      .catch(error => {
        // Handle errors (e.g., display error message)
        console.error('Error recording visit:', error);
      });
    });
  });


