ApiClient client = Postmark.getApiClient("b0e618f8-f49a-41da-a14f-629f0dd76d4c");
Message message = new Message("chofasbff@gmail.com", "chofasbff@gmail.com", "Hello from Postmark!", "Hello message body");
message.setMessageStream("outbound");
MessageResponse response = client.deliverMessage(message);
