import cv2
import numpy as np

def get_centroid(rect):
    return(rect[0]+rect[2]//2, rect[1]+rect[3]//2)

cap=cv2.VideoCapture(0)

face_cascade = cv2.CascadeClassifier("haarcascade_frontalface_default.xml")

if(not cap.read()[0]):
    print("Camera non disponibile")
    exit(0)

while(cap.isOpened()):

    _,frame = cap.read()
    gray=cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    faces= face_cascade.detectMultiScale(gray, 1.1, 20)

    for rect in faces:
        centroid = get_centroid(rect)
        cv2.circle(frame, centroid, 4, (0,0,255), cv2.FILLED)

    cv2.imshow("frame", frame)

    if(cv2.waitKey(1)==ord("q")):
        break
cap.realease()
cv2.destroyAllWindows()