require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.magic('clipboard', () => subject => {
	navigator.clipboard.writeText(subject)
});

Alpine.magic('now', () => {
	return (new Date).toLocaleTimeString()
});

Alpine.start();

console.log(Alpine);

// Alpine.magic('clipboard', () => subject => {
// 	alert();
// 	navigator.permissions.query({name: "clipboard-write"}).then(result => {
// 		if (result.state == "granted" || result.state == "prompt") {
// 			/* write to the clipboard now */
// 			navigator.clipboard.writeText(subject);
// 		}else {
// 			alert("Couldn't write to clipboard")
// 		}
// 	});
// })
