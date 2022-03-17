import cv2

cap = cv2.VideoCapture(0)
face_cascade = cv2.CascadeClassifier("haarcascade_frontalcatface.xml")

if(not cap.read()[0]):
    print("Webcam non trovata")
    exit(0)

while(cap.isOpened()):

    _,frame =cap.read()

    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.05, 6)

    for (x,y,w,h) in faces:
        cv2.rectangle(frame, (x,y), (x+w,y+h), (255,255,0), 1)
        print('Ciao')

    cv2.imshow("Webcam", frame)
    k = cv2.waitKey(1)
    
    if(k==ord("q")):
        break    
    elif(k==ord("f")):
        cv2.imwrite('foto.jpg', frame)
        print('Foto scattata')

cap.release()
cv2.destroyAllWindows()