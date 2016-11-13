using System;
using UnityEngine;
using System.Collections;

public class Main : MonoBehaviour {
	public int[,] matrix;
	public GameObject prefab;
	void Start() {
		matrix = new int[,] {	
			{ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 },
			{ 0, 0, 0, 1, 0, 0, 0, 0, 0, 0 },
			{ 0, 0, 1, 1, 1, 1, 0, 0, 0, 0 },
			{ 0, 0, 0, 0, 1, 1, 0, 0, 0, 0 },
			{ 0, 1, 1, 1, 1, 1, 1, 1, 0, 0 },
			{ 0, 0, 1, 1, 1, 1, 1, 1, 0, 0 },
			{ 0, 0, 0, 0, 1, 1, 0, 1, 0, 0 },
			{ 0, 0, 0, 0, 1, 1, 0, 1, 0, 0 },
			{ 0, 0, 0, 0, 0, 1, 1, 1, 0, 0 },
			{ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 }
		};

		//GameObject cube = GameObject.CreatePrimitive (PrimitiveType.Cube);
		//cube.AddComponent<Rigidbody>();
		//cube.transform.position = new Vector3(0, 0, 0);
		//GameObject test = Instantiate(Resources.Load("PBL") as GameObject, new Vector3(0, 0, 0), Quaternion.identity) as GameObject;

		// Create the cells
		for (int i = 0; i < 10; i++) {
			for (int j = 0; j < 10; j++) {
				if (matrix [i, j] == 1) {
					GameObject test = Instantiate (Resources.Load ("Foo") as GameObject, new Vector3 (i * 5.4f, 2, j * 5.4f), Quaternion.identity) as GameObject;
					if((i != 0 & i != 9) & (j != 0 & j != 9)){
						foreach(Transform child in test.transform) {
							if (child.name == "North") {
								if (matrix [i + 1, j] == 1)
									Destroy (child.gameObject);
							} else if (child.name == "East") {
								if (matrix [i, j - 1] == 1)
									Destroy (child.gameObject);
							} else if (child.name == "South") {
								if (matrix [i - 1, j] == 1)
									Destroy (child.gameObject);
							} else if (child.name == "West") {
								if (matrix [i, j + 1] == 1)
									Destroy (child.gameObject);
							}
						}
					}
				}
			}
		}
	}
}


