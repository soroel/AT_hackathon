# works with both python 2 and 3
from __future__ import print_function

import africastalking

class SMS:
    def __init__(self):
        # Set your app credentials
        self.username = "soroel"
        self.api_key = "1a5a7e4c619fb59d7f5d4a32f72a1cbd3ef47675b010032229c279b0ce71c9d1"

        # Initialize the SDK
        africastalking.initialize(self.username, self.api_key)

        # Get the SMS service
        self.sms = africastalking.SMS

    def send(self):
        # Set the numbers you want to send to in international format
        recipients = ["+254794846211"]

        # Set your message
        message = "heeeey, this is a test message from miss developer"

        # Set your shortCode or senderId
        #sender = "soroel"
        try:
            # Thats it, hit send and we'll take care of the rest.
            response = self.sms.send(message, recipients)
            print (response)
        except Exception as e:
            print ('Encountered an error while sending: %s' % str(e))

if __name__ == '__main__':
    SMS().send()