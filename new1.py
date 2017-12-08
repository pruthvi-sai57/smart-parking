import cv2
import time
import json
cap = cv2.VideoCapture('lhc1.avi')
car_cascade = cv2.CascadeClassifier('cars.xml')
 
while True:
    #time.sleep(10)
    ret, frame = cap.read()
    count=1
    frames = cv2.resize(frame, (225, 185), interpolation = cv2.INTER_LINEAR)
    gray = cv2.cvtColor(frames, cv2.COLOR_BGR2GRAY)
     
    cars = car_cascade.detectMultiScale(gray, 1.1, 1)
     
    for (x,y,w,h) in cars:
        cv2.rectangle(frames,(x,y),(x+w,y+h),(0,0,255),2)
        count+=1
    #print(*range(1,count))
    #print(count)
    list1 = [i for i in range(1, count)]
    my_dict = {}
    my_dict['Name'] = list1
    #for keys,values in my_dict.items():
        #print(values)
    to_json = json.dumps(my_dict)
    print(to_json)
    cv2.imshow('video2', frames)

    if cv2.waitKey(33) == 27:
    	break
 
cv2.destroyAllWindows()
