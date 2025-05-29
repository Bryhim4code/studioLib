document.addEventListener('DOMContentLoaded', function () {
    const fieldsToMonitor = [
        'email', 'country', 'dob', 'phone', 'school',
        'course', 'level', 'address', 'photo', 'govt_id'
    ];

    fieldsToMonitor.forEach(fieldId => {
        const fieldElement = document.getElementById(fieldId);
        if (fieldElement) {
            fieldElement.addEventListener('change', updateProgress);
        }
    });

    function updateProgress(event) {
        if (event) event.preventDefault();

        fetch(progressCheckUrl)
            .then(response => response.json())
            .then(data => {
                updateProgressSteps(data);

                const checkProgressLink = document.getElementById('check-progress-link');
                const kycDeniedMessage = document.getElementById('kyc-denied-message');
                const kycCompleteMessage = document.getElementById('kyc-complete-message');
                const missingFieldsContainer = document.getElementById('missing-fields-list');

                const allComplete = data.step1 && data.step2 && data.step3 && data.step4;

                if (allComplete) {
                    checkProgressLink.classList.remove('disabled');
                    $('#bookingModal').modal('show');

                    if (kycDeniedMessage) kycDeniedMessage.style.display = 'none';
                    if (kycCompleteMessage) kycCompleteMessage.style.display = 'block';
                    if (missingFieldsContainer) missingFieldsContainer.innerHTML = '';
                } else {
                    checkProgressLink.classList.add('disabled');
                    $('#incompleteStepsModal').modal('show');

                    if (kycDeniedMessage && kycStatus === 'DENIED') {
                        kycDeniedMessage.style.display = 'block';
                    }

                    if (kycCompleteMessage) kycCompleteMessage.style.display = 'none';

                    const missingSections = [];
                    if (!data.step1) missingSections.push("Basic Information");
                    if (!data.step2) missingSections.push("Contact Details");
                    if (!data.step3) missingSections.push("Add your valid Lead city student ID card");
                    if (!data.step4) missingSections.push("Next of Kin / Guardian Infomation ");

                    if (missingFieldsContainer) {
                        missingFieldsContainer.innerHTML = "Missing Sections:<ul>" +
                            missingSections.map(s => `<li>${s}</li>`).join('') +
                            "</ul>";
                    }
                }

                fieldsToMonitor.forEach(fieldId => {
                    const fieldElement = document.getElementById(fieldId);
                    if (fieldElement) {
                        if (!fieldElement.value || fieldElement.value.trim() === '') {
                            fieldElement.classList.add('field-error');
                        } else {
                            fieldElement.classList.remove('field-error');
                        }
                    }
                });
            })
            .catch(error => console.error('Error:', error));
    }

    function updateProgressSteps(data) {
        updateStep('step1', data.step1);
        updateStep('step2', data.step2);
        updateStep('step3', data.step3);
        updateStep('step4', data.step4);
    }

    function updateStep(stepId, isComplete) {
        const stepElement = document.getElementById(stepId);
        if (stepElement) {
            if (isComplete) {
                stepElement.classList.add('completed');
            } else {
                stepElement.classList.remove('completed');
            }
        }
    }

    updateProgress(); // Initial run
});
