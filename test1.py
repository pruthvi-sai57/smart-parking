import cv2
import numpy as np;
import json

# Read image
im = cv2.imread("plot1.jpeg", cv2.IMREAD_GRAYSCALE)

# Setup SimpleBlobDetector parameters.
params = cv2.SimpleBlobDetector_Params()

# Change thresholds
params.minThreshold = 10
params.maxThreshold = 200


# Filter by Area.
params.filterByArea = True
params.minArea = 1500

# Filter by Circularity
params.filterByCircularity = True
params.minCircularity = 0.1

# Filter by Convexity
params.filterByConvexity = True
params.minConvexity = 0.87

# Filter by Inertia
params.filterByInertia = True
params.minInertiaRatio = 0.01

# Create a detector with the parameters
ver = (cv2.__version__).split('.')
if int(ver[0]) < 3 :
    detector = cv2.SimpleBlobDetector(params)
else : 
    detector = cv2.SimpleBlobDetector_create(params)


# Detect blobs.
keypoints = detector.detect(im)
#if (keypoints)
free=len(keypoints)
#print(free)

#text_file = open("sample.txt", "w+")
#text_file.write("Purchase Amount: %d" % free)
#text_file.close()


#plot1-->[<KeyPoint 0349B8B8>, <KeyPoint 0349B890>, <KeyPoint 04838AE8>, <KeyPoint 04838B10>]
#  [<KeyPoint 0378B890>, <KeyPoint 0378B840>, <KeyPoint 04B27AC0>, <KeyPoint 04B27AE8>,
## <KeyPoint 04B27B10>, <KeyPoint 04B27B38>, <KeyPoint 04B27B60>, <KeyPoint 04B27B88>]


# Draw detected blobs as red circles.
# cv2.DRAW_MATCHES_FLAGS_DRAW_RICH_KEYPOINTS ensures
# the size of the circle corresponds to the size of blob

#im_with_keypoints = cv2.drawKeypoints(im, keypoints, np.array([]), (0,0,255), cv2.DRAW_MATCHES_FLAGS_DRAW_RICH_KEYPOINTS)

# Show blobs
#cv2.imshow("Keypoints", im_with_keypoints)
#cv2.waitKey(0)


list1=[1,2,3,4,5]
#list1.append(i);
my_dict = {}
my_dict['Name']=list1
#my_dict['Name'].append(list1)
to_json =json.dumps(my_dict)
print (to_json)

