using UnityEngine;
using System.Collections;

public class test : MonoBehaviour {

	public GameObject prefab;

	// Use this for initialization
	void Start () {
		Instantiate (prefab, new Vector3 (0.0f, 0.0f, 0.0f), Quaternion.identity);	
	}
	
	// Update is called once per frame
	void Update () {
	
	}
}
