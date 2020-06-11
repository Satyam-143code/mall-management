import React, { Component } from 'react';
import axios from 'axios';
import './CommonStyle.css';
import { connect } from 'react-redux';



var Resp=[];

class ShopEmployees extends Component {
  state={
    Employee:null,
    Designation:null,
    Gender:null,
    Mobile:null,
    Email:null,
    Address:null,
    ShopEmployees:[],
    User_Id:this.props.User_Id,
    isopened:false,

}
onAddHandle=(e)=>{
     this.setState({
        [e.target.id]:e.target.value,

    })
}
onSubmit=(e)=>{
  //  e.preventDefault();
  // console.log(this.state);
    axios.post('http://localhost:/backend-mall-management/ManagerPage/Employee/Employee.php',this.state)
    .then(res => console.log(res.data));

    this.setState({
        Employee:'',
        Designation:'',
        Gender:'',
        Mobile:'',
        Email:'',
        Address:''
    })

    
}

setInputBox(i){
 var Employee=document.getElementById('Employee');
 var Designation=document.getElementById('Designation');
 var Gender=document.getElementById('Gender');
 var Mobile=document.getElementById('Mobile');
 var Email=document.getElementById('Email');
 var Address=document.getElementById('Address');
 var Employee_Id=document.getElementById('Employee_Id');

  Employee.value=i.Employee;
  Designation.value=i.Designation;
  Gender.value=i.Gender;
  Mobile.value=i.Mobile;
  Email.value=i.Email;
  Address.value=i.Address;
  Employee_Id.value=i.Employee_Id;

}

onDelete=(e)=>{
  //  e.preventDefault();
  var Employee_Id=document.getElementById('Employee_Id');
  var Employee1=Employee_Id.value
  axios.get('http://localhost/backend-mall-management/ManagerPage/Employee/DeleteEmployee.php?Employee1='+Employee1)
  .then(result=>console.log(result))
  .catch(function(error){
    console.log(error);
  })
  this.setState({
    Employee:'',
    Designation:'',
    Gender:'',
    Mobile:'',
    Email:'',
    Address:''
})
}

onUpdate=(e)=>{
  // e.preventDefault();
 var Employee=document.getElementById('Employee');
 var Designation=document.getElementById('Designation');
 var Gender=document.getElementById('Gender');
 var Mobile=document.getElementById('Mobile');
 var Email=document.getElementById('Email');
 var Address=document.getElementById('Address');
 var Employee_Id=document.getElementById('Employee_Id');
  var Jform=
    {
      Employee:Employee.value,
      Designation:Designation.value,
      Gender:Gender.value,
      Mobile:Mobile.value,
      Email:Email.value,
      Address:Address.value,
      Employee_Id:Employee_Id.value
    };
    axios.post('http://localhost/backend-mall-management/ManagerPage/Employee/UpdateEmployee.php',Jform)
    .then(res => console.log(res.data));

}


componentDidMount=()=>{

  this.setState({isopened:true});

  
}


componentDidUpdate(){
let myArray=[];
  axios.get('http://localhost/backend-mall-management/ManagerPage/Employee/EmployeeList.php?User_Id='+this.state.User_Id)
  .then(response=>{
    
     Resp=response.data;
  for(let i=0;i<Resp.length;i+=1){
    myArray.push(<tr key={i} onClick={()=> this.setInputBox(Resp[i]) }>
      <td>{Resp[i].Employee_Id}</td>
      <td >{Resp[i].Employee}</td>
      <td >{Resp[i].Designation}</td>
      <td>{Resp[i].Gender}</td>
      <td>{Resp[i].Mobile}</td>
      <td>{Resp[i].Email}</td>
      <td>{Resp[i].Address}</td>
    </tr>)
  
  }

  this.setState({ShopEmployees:myArray});
  })
  .catch(function(error){
    console.log(error);
  })
}
    render(){
      return (
        <div className="container">
            <div className="subcontainer1">
                <form>
                     <div className="row">
              <div className="col-25">
                <label htmlFor="Employee">Name:</label>
              </div>
              <div className="col-75">
                <input type="text" id="Employee" name="EmployeeName" placeholder="Employee" onChange={this.onAddHandle} value={this.state.Employee}/>
              </div>
            </div>
            <div className="row">
              <div className="col-25">
                <label htmlFor="Designation">Designation:</label>
              </div>
              <div className="col-75">
                <input type="text" id="Designation" name="Designation" placeholder="Designation" onChange={this.onAddHandle} value={this.state.Designation}/>
              </div>
            </div>
            <div className="row">
              <div className="col-25">
                <label htmlFor="Gender">Gender:</label>
              </div>
              <div className="col-75">
                <input list='gender' type="text" id="Gender" name="Gender" placeholder="Gender" onChange={this.onAddHandle} value={this.state.Gender}/>
                <datalist id='gender'>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Others</option>
                </datalist>
              </div>
            </div>
            <div className="row">
              <div className="col-25">
                <label htmlFor="Mobile">Mobile Number:</label>
              </div>
              <div className="col-75">
                <input type="text" id="Mobile" name="MobNum" placeholder="Mobile Num.." onChange={this.onAddHandle} value={this.state.Mobile}/>
              </div>
            </div>
            <div className="row">
              <div className="col-25">
                <label htmlFor="Email">Email:</label>
              </div>
              <div className="col-75">
                <input type="email" id="Email" name="Email" placeholder="ex: john@xyzmail.com" onChange={this.onAddHandle} value={this.state.Email}/>
              </div>
            </div>
            <div className="row">
              <div className="col-25">
                <label htmlFor="Address">Address:</label>
              </div>
              <div className="col-75">
                <textarea id="Address" name="Address" placeholder="Address.." style={{height:150}} onChange={this.onAddHandle} value={this.state.Address}></textarea>
              </div>
            </div>
            <div className="row" style={{visibility:'hidden'}}>
              <div className="col-25" >
                <label htmlFor="Employee_Id">Employee_Id</label>
              </div>
              <div className="col-75">
             <input type='text' id="Employee_Id" name="Employee_Id" placeholder="AdEmployee_Id"  onChange={this.onAddHandle} value={this.state.Employee_Id}/>
              </div>
            </div>
            <br></br>
            <div className="actions">
              <div className="row">
                <input type="submit" value="Delete" onClick={this.onDelete}/>
              </div>
              <div className="row">
                <input type="submit" value="Update" onClick={this.onUpdate}/>
              </div>
              <div className="row">
                <input type="submit" value="Submit" onClick={this.onSubmit}/>
              </div>
            </div>
            </form>
            </div>
         
              <div className="subcontainer2">
                <table id="customers">
                <thead>
                    <th>Employer_Id</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Gender</th>
                    <th>Mobile Number</th>
                    <th>Shop Email</th>
                    <th>Address</th>
                  </thead>
                  <tbody>
                  {this.state.ShopEmployees}
                  </tbody>
        
                </table>
              </div>
            </div>

    
      )
    }
}


const mapStateToProps = (state) => {
  return{
  User_Id: state.storeId
  }
}

export default connect(mapStateToProps)(ShopEmployees);