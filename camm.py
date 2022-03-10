import cv2

cap=cv2.VideoCapture(0)
ret, frame=cap.read()

if(not ret):
    print('Telecamera non rilevata')
    exit(0)
    
cv2.imshow("webcam", frame)
cv2.imwrite("cattura.jpg", frame)
cv2.waitKey(0)