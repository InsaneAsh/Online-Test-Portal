// document.querySelector("#cross-edit-modal").addEventListener("click", function(){
//     document.querySelector(".edit-open-modal").style.display = "none";
// });
// let openEditModal = () =>{
//     document.querySelector(".edit-open-modal").style.display = "block";
// }
let openEditModal = (value) =>{
    let personal_details_node = `<div class="form-edit-personal-details">
                    <form action="/Test Guru/PHP/submitPersonalDetails.php" method="post" class="edit-personal-from">
                        <div class="input-and-label">
                            <label for="date_of_birth" class="for-all-label">Date Of Birth:</label>
                            <input class="edit-personal-input" type="date" id="date-of-birth" name="date_of_birth" required>
                        </div>
                        
                        <div class="input-and-label">
                            <label for="gender" class="for-all-label">Gender:</label>
                            <input class="edit-personal-input" type="text" id="gender" name="gender" required>
                        </div>
                        
                        <div class="input-and-label">
                            <label for="nationality" class="for-all-label">Nationality:</label>
                            <input class="edit-personal-input" type="text" id="nationality" name="nationality" required>
                        </div>
                        <div class="input-and-label">
                            <label for="blood_group" class="for-all-label">Blood Group:</label>
                            <input class="edit-personal-input" type="text" id="blood-group" name="blood_group" required>
                        </div>
                        <br>
                        <button class="edit-personal-btn" type="submit">Submit</button>
                        
                    </form>`;

    let address_details_node = `<div class="form-edit-personal-details">
                    <form action="/Test Guru/PHP/insertAddressDetails.php" method="post" class="edit-personal-from">
                        <div class="input-and-label">
                            <label for="permanent_address" class="for-all-label">Permanent Address:</label>
                            <input class="edit-personal-input" type="text" id="permanent-address" name="permanent_address" required>
                        </div>
                        
                        <div class="input-and-label">
                            <label for="p_a_pincode" class="for-all-label">Permanent Address Pin Code:</label>
                            <input class="edit-personal-input" type="number" id="p-a-pincide" name="p_a_pincode" required>
                        </div>
                        
                        <div class="input-and-label">
                            <label for="c_address" class="for-all-label">Correspondance Address:</label>
                            <input class="edit-personal-input" type="text" id="c_address" name="c_address" required>
                        </div>
                        <div class="input-and-label">
                            <label for="c_a_pincode" class="for-all-label">Correspondance Address Pin Code:</label>
                            <input class="edit-personal-input" type="number" id="c-a-pincode" name="c_a_pincode" required>
                        </div>
                        <br>
                        <button class="edit-personal-btn" type="submit">Submit</button>
                        
                    </form>`;
    if(document.querySelector("#empty-modal").hasChildNodes){
        document.querySelector("#empty-modal").replaceChildren();
        if(value == "Personal Details"){
            document.querySelector(".edit-open-modal").style.display = "block";
            document.querySelector("#name-of-detail").innerHTML = value;
            document.querySelector("#empty-modal").insertAdjacentHTML("beforeend", personal_details_node);
            }
            else{
                document.querySelector(".edit-open-modal").style.display = "block";
            document.querySelector("#name-of-detail").innerHTML = value;
            document.querySelector("#empty-modal").insertAdjacentHTML("beforeend", address_details_node);
            }
    }else{
        if(value == "Personal Details"){
            document.querySelector(".edit-open-modal").style.display = "block";
            document.querySelector("#name-of-detail").innerHTML = value;
            document.querySelector("#empty-modal").insertAdjacentHTML("beforeend", personal_details_node);
            }
            else{
                document.querySelector(".edit-open-modal").style.display = "block";
            document.querySelector("#name-of-detail").innerHTML = value;
            document.querySelector("#empty-modal").insertAdjacentHTML("beforeend", personal_details_node);
            }
    }
    
}

