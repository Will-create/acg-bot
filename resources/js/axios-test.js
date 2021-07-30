import Axios from 'axios'

// console.log('hello!
// axios.post('coupedumonde' , {content: 'le message de telecel affiche le match entre BF vs CI'}).then(respond => {
//     //  console.log(respond.data)
//     document.getElementById('afficher').innerHTML = respond.data
// })

const getUsers = () => {
    axios.get('https://reqres.in/api/users', {avatar: "https://reqres.in/img/faces/1-image.jpg",
    email: "george.bluth@reqres.in",
    first_name: "George",
    id: 1,
    last_name: "Bluth"})
    .then(response => {
    const users = response.data.data;
    document.getElementById('afficher').innerHTML = users;
    console.log(`GET users`, users);

    })
     .catch(error => console.error(error));
    };
    getUsers();


    const createUser = (user) => {
        axios.post('https://reqres.in/api/users', user)
        .then(response => {
        const addedUser = response.data;
        document.getElementById('afficher').innerHTML = addedUser;
        console.log(`POST: user is added`, addedUser);
        // append to DOM
         appendToDOM([addedUser]);
         })
         .catch(error => console.error(error));
        };


        const deleteUser = (elem, id) => {
            axios.delete(`https://reqres.in/api/users/${id}`)
            .then(response => {
            console.log(`DELETE: user is removed`, id);
            // remove elem from DOM
        document.getElementById('afficher').innerHTML = users;

            elem.remove();
            })
            .catch(error => console.error(error));
            };

            const createLi = (user) => {
                const li = document.createElement('li');
                // add user details to `li`
                li.textContent = `${user.id}: ${user.first_name} ${user.last_name}`;
                // attach onclick event
                li.onclick = e => deleteUser(li, user.id);
                return li;
                };