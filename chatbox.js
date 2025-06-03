// chatbox.js
document.addEventListener('DOMContentLoaded', () => {
  const sendBtn = document.getElementById('sendBtn');
  const textarea = document.querySelector('#chatbox textarea');
  const chatMessages = document.createElement('div');
  
  chatMessages.style.marginTop = '10px';
  chatMessages.style.maxHeight = '200px';
  chatMessages.style.overflowY = 'auto';
  chatMessages.style.borderTop = '1px solid #ccc';
  chatMessages.style.paddingTop = '10px';
  document.getElementById('chatbox').appendChild(chatMessages);

  sendBtn.addEventListener('click', () => {
    const message = textarea.value.trim();
    if (message === '') {
      alert('Please enter a message.');
      return;
    }
    const msgElem = document.createElement('p');
    msgElem.textContent = "You: " + message;
    msgElem.style.backgroundColor = '#e1ffc7';
    msgElem.style.padding = '8px';
    msgElem.style.borderRadius = '5px';
    msgElem.style.marginBottom = '5px';
    msgElem.style.maxWidth = '80%';

    chatMessages.appendChild(msgElem);
    chatMessages.scrollTop = chatMessages.scrollHeight;
    textarea.value = '';
  });

  textarea.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendBtn.click();
    }
  });
});
