document.addEventListener("DOMContentLoaded", function () {
    const viewUserBtns = document.querySelectorAll(".viewUserBtn");
    const userModal = document.getElementById("userModal");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const buttonDetails = document.querySelectorAll(".buttondetails");
    const modal = document.getElementById("modal");
    const certificateNameElement = document.getElementById("certificateName");
    const certificateImageElement = document.getElementById("certificateImage");

    viewUserBtns.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            const userId = this.dataset.userId;
            fetch(`/admin/Users/${userId}`)
                .then((response) => response.json())
                .then((user) => {
                    if (user.error) {
                        alert(user.error);
                    } else {
                        document.getElementById("userPhoto").src =
                            user.profile_image
                                ? `/storage/${user.profile_image}`
                                : "https://via.placeholder.com/150";
                        document.getElementById("userName").innerText =
                            user.name;
                        document.getElementById("userEmail").innerText =
                            user.email;
                        document.getElementById(
                            "userAge"
                        ).innerText = `Age: ${user.age}`;
                        document.getElementById(
                            "userUsername"
                        ).innerText = `Username: ${user.username}`;
                        document.getElementById(
                            "userSchool"
                        ).innerText = `School: ${user.school}`;
                        document.getElementById(
                            "userAddress"
                        ).innerText = `Address: ${user.addres}`;
                        document.getElementById(
                            "userBio"
                        ).innerText = `Bio: ${user.bio}`;
                        document.getElementById("userInstagramLink").href =
                            user.instagram;
                        document.getElementById("userTiktokLink").href =
                            user.tiktok;
                        document.getElementById("userYoutubeLink").href =
                            user.youtube;
                        document.getElementById("userGithubLink").href =
                            user.github;
                        document.getElementById("userLinkedinLink").href =
                            user.linkedin;
                        userModal.classList.remove("hidden");
                    }
                });
        });
    });

    closeModalBtn.addEventListener("click", function () {
        userModal.classList.add("hidden");
    });

    window.addEventListener("click", function (e) {
        if (e.target === userModal) {
            userModal.classList.add("hidden");
        }
    });

    buttonDetails.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            const certificateId = this.dataset.certificateId;

            if (!certificateId) {
                console.error("Certificate ID is undefined or missing");
                return;
            }

            console.log(`Fetching data for certificate ID: ${certificateId}`);

            fetch(`/admin/sertifikat/${certificateId}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok " + response.statusText);
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.error) {
                        console.error("Error from server:", data.error);
                        alert(data.error);
                    } else {
                        certificateNameElement.innerText = data.name_certificate;
                        certificateImageElement.src =
                            `/storage/${data.image}` ||
                            "https://via.placeholder.com/150";
                        modal.classList.remove("hidden");
                    }
                })
                .catch((error) => console.error("Error fetching data:", error));
        });
    });

    closeModalBtn.addEventListener("click", function () {
        modal.classList.add("hidden");
    });

    window.addEventListener("click", function (e) {
        if (e.target === modal) {
            modal.classList.add("hidden");
        }
    });
});

